<template>
    <div>
        <div class="slow_card">
            <span style="display: flex; flex-direction: row; margin:0 auto;border:1px black solid">
                <input type="date" style="width: 45%;border-right:1px black solid;text-align:center;" v-model="search_start">
                <input type="date" style="width: 45%;border-right:1px black solid;text-align:center;" v-model="search_end">
                <span style="margin: 0 auto">
                    <img style="width: 15px;height:15px" :src=image_path_Three @click="resetDate()">
                </span>
            </span>
            <div class="list">
                <ul v-for="(row,index) in rows">
                    <li  v-if="((change_name(row.form_id) >= (search_start!=''?search_start:'1999-01-01')) && (change_name(row.form_id) <= (search_end!=''?search_end:'2222-01-01')))">
                        {{index+1}} :
                        {{ change_name(row.form_id) }}
                        <img :src=image_path_One alt="修改" @click="getFormId(row.form_id)"/>
                        <img :src=image_path_Two alt="刪除" @click="delFormId(row.form_id)"/>
                    </li>
                </ul>
            </div>
            <button class="btn-join-content" @click="resetData()">+</button>
        </div>
        <get-table :stud_teach_info=infos :check_infos=check_infos :conclusion=conclusion :restartData="resetData" :table_id="student_inter_id" :title_name="title_info"></get-table>
    </div>
</template>

<script>
    import getTablePath from './getTable';

    export default {
        name: "tableWay",
        data:function () {
            return{
                image_path_One:'../image/pencil.png',
                image_path_Two:'../image/delete.png',
                image_path_Three:'../image/testing.png',
                inter_name:"",
                file:new FormData(),
                infos: this.stud_info,
                check_infos:[
                    {ch_name: '人際關係', en_name:'relationship',check:false  ,context:""},
                    {ch_name: '異性交往', en_name:'association' ,check:false ,context:""},
                    {ch_name: '家庭狀況', en_name:'family'      ,check:false ,context:""},
                    {ch_name: '情緒困擾', en_name:'emotional'   ,check:false ,context:""},
                    {ch_name: '課業學習', en_name:'subject'     ,check:false ,context:""},
                    {ch_name: '生涯議題', en_name:'career'      ,check:false ,context:""},
                    {ch_name: '生理健康', en_name:'physiology'  ,check:false ,context:""},
                    {ch_name: '其他'   , en_name:'others'       ,check:false ,context:""}
                ],
                rows:this.stud_inter_info,
                student_inter_id:"",
                conclusion: {continue:false,center:false,others:""},
                search_start : "",
                search_end : "",
                title_info :[
                    {
                        'name': '新增',
                        'photo' : '../image/add.png'
                    }
                ],

            }
        },
        components:{
            'getTable' :getTablePath,
        },
        props:{
            stud_info:{
                type :Array,
            },
            stud_inter_info:{
                type : Array,
            },
        },
        methods:{
            change_name(id){
                let date =  id.substr(8,8);    //擷取日期
                let trainYear  =  date.substr(0,4);    //擷取年
                let trainMoun  =  date.substr(4,2);    //擷取月
                let trainData  =  date.substr(6,2);    //擷取日\
                let traindata;
                    traindata = trainYear + '-' + trainMoun + "-" + trainData ;
                return traindata ;
            },
            resetData(){
                this.check_infos.forEach(value => {
                    value.check = false;
                    value.context ="";
                });
                this.title_info[0]['name'] = "新增";
                this.title_info[0]['photo'] = '../image/add.png';
                this.student_inter_id = "";
                this.conclusion.continue=false;
                this.conclusion.center=false;
                this.conclusion.others="";
                this.file = new FormData;
            },
            resetDate(){
                this.search_start = "";
                this.search_end = "";
            },
            getFormId(id){
                let self = this;
                this.resetData();
                this.title_info[0]['name']= "修改";
                this.title_info[0]['photo'] = '../image/tools.png';
                this.student_inter_id = id;
                axios.post('/table/search/'+id,{
                    _method : "POST",
                    student:this.student,
                })
                .then(function(r) {
                    if(r.data.list_info[0].form_item_res!=null) { self.check_infos[0].context = r.data.list_info[0].form_item_res; self.check_infos[0].check = true;}
                    if(r.data.list_info[0].form_item_ass!=null) { self.check_infos[1].context = r.data.list_info[0].form_item_ass; self.check_infos[1].check = true;}
                    if(r.data.list_info[0].form_item_fam!=null) { self.check_infos[2].context = r.data.list_info[0].form_item_fam; self.check_infos[2].check = true;}
                    if(r.data.list_info[0].form_item_emo!=null) { self.check_infos[3].context = r.data.list_info[0].form_item_emo; self.check_infos[3].check = true;}
                    if(r.data.list_info[0].form_item_sub!=null) { self.check_infos[4].context = r.data.list_info[0].form_item_sub; self.check_infos[4].check = true;}
                    if(r.data.list_info[0].form_item_car!=null) { self.check_infos[5].context = r.data.list_info[0].form_item_car; self.check_infos[5].check = true;}
                    if(r.data.list_info[0].form_item_phy!=null) { self.check_infos[6].context = r.data.list_info[0].form_item_phy; self.check_infos[6].check = true;}
                    if(r.data.list_info[0].form_item_oth!=null) { self.check_infos[7].context = r.data.list_info[0].form_item_oth; self.check_infos[7].check = true;}

                    r.data.list_info[0].form_cont_ste == "false" ? self.conclusion.continue = false : self.conclusion.continue = true;
                    r.data.list_info[0].form_cont_hep == "false" ? self.conclusion.center   = false : self.conclusion.center   = true;

                    self.conclusion.others   = r.data.list_info[0].form_cont_oth;
                })
                .catch(function(error) {
                    console.log(error);
                    alert('存擋失敗');
                });
            },
            delFormId(id){
                let self = this;
                this.resetData();
                axios.post('/table/del/'+id,{
                    _method: 'POST'
                }).then(function (r) {
                    // console.log(r);
                    self.rows=r.data.stud_inter_info;
                    alert('已成功刪除');
                }).catch(function (e) {
                    console.log(e)
                })
            }
        },
    }
</script>

<style scoped>
    .slow_card{
        background-color: white;

        position: absolute;

        height: 160px;
        width: 270px;

        top: 15%;
        right: 300px;

        border: 1px #1b4b72 solid ;
        border-radius: 10px;
        padding : 20px 15px 20px 15px;
    }
    .btn-join-content{
        position: absolute;
        outline: none;
        bottom: 5px;
        left: -0.5px;
        width: 100%;
        border: 1px black solid;
    }
    .btn-join-content:hover{
        background-color: #3b4245;
        color:white;
    }
    .list{
        width: 100%;
        height: 70%;
        text-align:center;
        overflow: auto;
    }
</style>