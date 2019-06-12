<template>
    <div style="width: 90%;background-color: white;height: 460px;margin: auto;padding: 20px;border-radius: 20px;font-size: 20px">
        <table  style="width: 100%">
            <tr>
                <td style="width: 33%"><div>持續關懷</div></td>
                <td style="width: 33%"><div>轉藉學輔中心</div></td>
                <td style="width: 33%"><div>其他</div></td>
            </tr>
        </table>
        <div style="text-align: center;color:white" >
            <div style="display: flex; flex-direction: row;">
                <div style="width: 34%;overflow: auto;">
                    <div v-for="row in item_stu.info">
                        <div v-if="row.form_cont_ste !== 'false'">
                            <div class="row-style" style="background-color: rgb(155,44,44);"> {{row.stud_id}} {{row.stud_name}} </div>
                        </div>
                    </div>
                </div>
                <div style="width: 34%;overflow: auto;">
                    <div v-for="row in item_stu.info">
                        <div v-if="row.form_cont_hep !== 'false'">
                            <div class="row-style" style="background-color: rgb(100,160,100);"> {{row.stud_id}} {{row.stud_name}} </div>
                        </div>
                    </div>
                </div>
                <div style="width: 34%;overflow: auto;">
                    <div v-for="row in item_stu.info">
                        <div v-if="row.form_cont_oth !== null">
                            <div class="row-style" style="background-color: rgb(44,44,215);"> {{row.stud_id}} {{row.stud_name}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "endTalk",
        data:function () {
            return{
            }
        },
        props:{
            item_stu:{
                type:Object,
                default:"",
            }
        },
    }
</script>

<style scoped>
    .row-style{
        border: 1px white solid;
        font-size: 20px;
    }
</style>