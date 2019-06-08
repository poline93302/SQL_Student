<template>
    <div>
        <div class="modal-content">
            <div class="modal-tle">選擇訪談內容</div>
            <div class="modal-by">
                <div class="modal-group">
                    <p v-for="item in Infos">
                        <input type="checkbox" name="checkbox_Box" v-model="item.check"/>
                        <span style="width: 96px;text-align:center">{{item.ch_name}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span v-if="item.ch_name != '其他'">
                            <span v-if="item.check">
                                <input type="radio" :name= item.en_name value="優良" v-model="item.context">
                                <span>
                                    優良&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                                <input type="radio" :name= item.en_name value="普通" v-model="item.context">
                                <span>
                                    普通&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                                <input type="radio" :name= item.en_name value="待加強" v-model="item.context">
                                <span>
                                    待加強&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                            </span>
                        </span>
                    </p>
                </div>
            </div>
            <div class="close_modal" @click="restartContent()"> 清除</div>
            <div class="close_modal" @click="changeContent()"> 確定</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "modalChoiceShow",
        props:{
            Infos:{
                type:Array
            }
        },
        methods: {
            closeBtnChiose() {
                let modal = document.getElementById('Modal_Table');
                modal.style.display = 'none';
            },
            changeContent(){
                this.$emit('Infos');
                this.closeBtnChiose();
            },
            restartContent(){
                this.Infos.forEach(function(value){
                    value.check = false;
                    value.context = "";
                });
            }
        }
    }
</script>

<style scoped>
    .modal-content{
        position: fixed;
        top:10%;
        left:30%;
        border-radius: 10px;
        background-color: white;
        height: 400px;
        margin: 50px;
        border: 1px solid #888;
        width: 500px;
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
    .modal-group{
        padding-left: 10%;
    }
    .close_modal{
        text-align: center;
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

    @keyframes  btn-change-bkcolor{
        from{
            background-color: #3b4245;
        }to{
             background-color: #1d68a7;
         }
    }
</style>