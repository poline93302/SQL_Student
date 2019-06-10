<template>
    <div>
        <p style="text-align: center;font-size:32px">
            {{title_name[0]['name']}}
            <img :src="this.title_name[0]['photo']">
        </p>
            <p class="span-row-2 " style="padding-bottom: 10px;">2.  訪談項目
                <img :src=image_path id="choiceClass" onclick="Get_Choice();"/>
            </p>
<!--            訪談項目倒出-->
            <div class="flex flex-container-row flex-wrap">
                <div v-for="  item in check_infos  ">
                    <div v-if="  item.check  ">
                    <div class="card-s">
                            <span>{{  item.ch_name  }}</span>
                            <textarea cols="20" rows="8" style="border:1px black dotted;" v-model="item.context">{{  item.context  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>


            <p class="span-row-2" style="padding-bottom: 10px;">3.  結語   </p>      <!-- 3. -->
            <div class="span-row-3">
                <input type="checkbox" v-model="conclusion.continue"/><span>持續關懷</span> &nbsp;&nbsp;&nbsp;
                <input type="checkbox" v-model="conclusion.center"  /><span>轉介學輔中心</span> &nbsp;&nbsp;&nbsp;
                <span>其他:</span>
                <input type="text" v-model="conclusion.others">
            </div>

            <p class="span-row-2" style="padding-bottom: 10px;">4.  檔案上傳</p>      <!-- 4. -->
            <div class="span-row-3">
                <input type="file" class="btn" value="照片/影片上傳" @change="get_Up_Filename($event)">
            </div>

            <span class="span-row-2" style="padding-bottom: 10px;">
                    <div class="btn-group" style="padding-left:80%;">
                        <span v-if="table_id==''">
                            <button @click="checkThing(table_id)" class="btn">送出</button>
                        </span>
                        <span v-else>
                            <button @click="checkThing(table_id)" class="btn">修改</button>
                        </span>
                            <button @click="linkOuter()" class="btn">返回班級列表</button>
                    </div>
            </span>

        <div class="modal" id="Modal_Table">
            <modal-choice-show :Infos="check_infos"></modal-choice-show>
        </div>
    </div>
</template>

<script>

    import InterChoicePath from './modalChoiceShow.vue';

    export default {
        name: "getTable",
        props:{
            stud_teach_info: {
                type : Array,
            },
            check_infos:{
                type : Array,
            },
            conclusion:{
                type : Object,
            },
            restartData: {
                type: Function,
            },
            table_id:{
                type: String,
            },
            title_name:{
                type: Array,
            }
        },
        data:function () {
            return{
                student_id     :  this.stud_teach_info[0],
                successPath    :'/info',
                tablecreatPath :'/new',
                image_path : '../image/edit.png',
                // image_neworedit : ,
            }
        },
        components:{
            'modalChoiceShow' :InterChoicePath,
        },
        methods:{
            get_Up_Filename(event){
                this.file.append('file', event.target.files[0]);
            },
            linkOuter(){
                window.location.href = this.successPath;
            },
            ajaxGo(){
                axios.post('/table/new',{
                    _method : "POST",
                    student: this.student_id,
                    table_id: this.table_id != '' ? this.table_id:"",
                    check_info:[
                        this.check_infos[0].context,
                        this.check_infos[1].context,
                        this.check_infos[2].context,
                        this.check_infos[3].context,
                        this.check_infos[4].context,
                        this.check_infos[5].context,
                        this.check_infos[6].context,
                        this.check_infos[7].context,
                    ],
                    conclusion: [
                        this.conclusion.continue?"true":"false",
                        this.conclusion.center  ?"true":"false",
                        this.conclusion.others,
                    ],
                    file: this.file,
                })
                .then(function(r) {
                    console.log(r.data);
                    console.log(this.table_id);
                    alert(r.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
                this.restartData();
                window.location.href = '/table/'+this.student_id;
            },
            checkThing(id){
                let on = false;
                this.check_infos.forEach(function(e){
                    if(e.check){
                        on =true;
                        console.log("output")
                    }
                });
                on ? this.ajaxGo(): alert('請輸入資料');
            },

        }
    }
</script>

<style scoped>

</style>