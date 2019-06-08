<template>
        <div id="regModal" class="modal-content">
            <div class="modal-tle">
                <span>註冊</span>
            </div>
            <form action='registered' method="post" name="regForm">
                <input type="hidden" name="_token" :value="csrf" />
                <table class="modal-by table-card">
                    <tr>
                        <td>
                            <label>  姓 名 ：</label>
                        </td>
                        <td>
                            <input type="text" name="regName" class="type-text-style" v-model="newName"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>  班 級 ：</label>
                        </td>
                        <td>
                            <input type="text" name="regClass" class="type-text-style" v-model="newClass"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>  帳 號 ：</label>
                        </td>
                        <td>
                            <input type="text" name="regID" class="type-text-style" v-model="newID"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>  密 碼 ：</label>
                        </td>
                        <td>
                            <input type="password" name="regPassword" class="type-text-style" v-model="newPassword"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>再次確認 ：</label>
                        </td>
                        <td>
                            <input type="password" name="regPasswordAgain" class="type-text-style" v-model="newAgPassword"/>
                        </td>
                    </tr>
                </table>
                <div class="modal-ft">
                    <button type="button" class="btn-part" @click='checkInfo()'> 創建</button>
                    <button type="reset"  class="btn-part"> 清除</button>
                </div>
            </form>
            <div class="close_modal" id="closeBtn" @click='closeBtnOn()'  style="-webkit-user-select: none">取消</div>
        </div>
</template>

<script>
    export default {
        name: "modalShow",
        data:function(){
            return{
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                newName      :"",
                newPassword  :"",
                newAgPassword:"",
                newClass     :'',
                newID        :''
            }
        },
        props:{
            info:{
                type : String,
            }
        },
        methods:{
            closeBtnOn(){
                let modal =  document.getElementById('Modal_Reg');
                this.resetData();
                modal.style.display = 'none';
            },
            checkInfo(){
                let theForm = document.forms['regForm'];

                if((this.newName.length != 0) &&(this.newID.length != 0) &&(this.newClass.length != 0)) {
                    if((this.newPassword.length >=6)){
                        if(this.newPassword === this.newAgPassword){
                            theForm.submit();
                        }
                    }else{
                        this.resetData();
                        alert('密碼未滿6個字')
                    }
                }else{
                    this.resetData();
                    alert('請填入必要資料')
                }
            },
            resetData(){
                this.newPassword = this.newAgPassword = this.newName = this.newClass = this.newID = null;
            }
        }
    }
</script>

<style scoped>

    .modal-content{
        border-radius: 10px;
        background-color: white;
        height: 420px;
        margin: 50px auto;
        border: 1px solid #888;
        width: 40%;
    }
    .modal-tle{
        width: 94%;
        font-size: 20px;
        padding-left: 3%;
        padding-bottom: 2%;
        margin: 2%;
        text-align: left;
        border-width: 0px 0px 3px 0px;
        border-style:solid ;
        border-color: #000000;
    }
    .close_modal{
        margin-top: 10px;
        background-color: #3b4245;
        color: white;
        padding:2px;
        border-radius :2px;

    }
    .close_modal:hover{
        animation: btn-change-bkcolor 100ms linear;
        animation-fill-mode: forwards;
    }
    .modal-by{
        margin: 20px auto;
    }
    .btn-part{
        background-color: #a29ea4;
        padding: 10px;
        border-radius : 5px;
        margin: 5% 1% 1% 0;
    }
    .table-card{
        border-spacing: 0 ;
        padding: 0;
        width: 100%;
    }
    .table-card >tr,td{
        background-color: white;
        border: none;
    }
    .type-text-style{
        border:1px black solid;
        width: 90%;
        float:left;
    }
    @keyframes  btn-change-bkcolor{
        from{
            background-color: #3b4245;
        }to{
             background-color: #1d68a7;
         }
    }
</style>