<template>
    <div>
            <p class="span-row-2 " style="padding-bottom: 10px;">2.  訪談項目
                <img src="image/edit.png" id="choiceClass" onclick="Get_Choice();"/>
            </p>
<!--            訪談項目倒出-->
            <div class="flex flex-container-row flex-wrap">
                <div v-for="  item in check_infos  ">
                    <div v-if="  item.check  ">
                    <div class="card-s">
                            <span>{{  item.ch_name  }}</span>
                            <textarea cols="20" rows="8" style="border:1px black dotted;">{{  item.context  }}</textarea>
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
                        <button @click="checkThing()" class="btn">送出</button>
                        <button @click="linkOuter()" class="btn">取消</button>
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
            }
        },
        data:function () {
            return{
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
                conclusion: {continue:false,center:false,others:""},
                file:new FormData(),
                student_id     :  this.stud_teach_info[0],
                successPath    :'/info',
                tablecreatPath :'/new',
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
                    alert('存擋成功');
                })
                .catch(function(error) {
                    console.log(error);
                    alert('存擋失敗');
                });
            },
            checkThing(){
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