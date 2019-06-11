<template>
    <div class="flex flex-container-row">
        <div style="width: 12%">
            <div style="height:70px">
                <button class="btn" style="width: 100px;height: 50px;background-color: #1d643b" @click=getaxios>結語</button>
            </div>
            <div style="height:70px">
                <button class="btn" style="width: 100px;height: 50px">人數</button>
            </div>
        </div>
        <div style="width: 90%;background-color: white;height: 550px;margin: auto;padding: 20px;border-radius: 20px">
            <table  style="width: 100%">
                <tr>
                    <td style="width: 33%"><div>持續關懷 (人數X人)</div></td>
                    <td style="width: 33%"><div>轉藉學輔中心(人數X人)</div></td>
                    <td style="width: 33%"><div>其他(人數X人)</div></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "toneFater",
        data:function () {
            return {
                Mode:'tone',
                ste_count:[],
                cha_count:[],
                oth_count:[],
            }
        },
        methods:{
            getaxios(){
                axios.post('/')
            },
        }
    }
</script>

<style scoped>

</style>