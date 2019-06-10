<template>
    <div>
        <div class="flex-container-row">
            <br>
            <div class="blade-ship"><br>
                <span>關鍵字：</span>
                <input type="text" placeholder="找尋關鍵字" v-model="keyPoint" @change="changeData()">
            </div>
            <table width="100%" class="table-list">
            <tr>
                <th width="15%">學號</th>
                <th width="15%">姓名</th>
                <th width="10%">姓別</th>
                <th width="20%">地址</th>
                <th width="10%">訪談次數</th>
                <th width="30%">訪談資訊</th>
            </tr>
            <tr v-for="(row,index) in rows">
                <td>{{ row.stud_id }}</td>
                <td>{{ row.stud_name }}</td>
                <td>{{ row.stud_sex }}</td>
                <td>{{ row.stud_address }}</td>
                <td>{{ row.times != null? row.times :0}}</td>
                <td>
                    <a class="btn-small-Green   btn-small link-dis-hash" :href="'table/'+(row.stud_id)" >  訪談介面  </a>
                </td>
            </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name:'ShowList',
        data:function(){
            return{
                keyPoint:"",
                rows:this.infos,
            }
        },
        props:{
            infos:{
                type:Object,
            },
        },
        methods:{
        //    改變時將資料從ＣＡＬＬ
            changeData(){
                this.getData();
            },
            getData(){
                let self = this;
                axios.post('/info/update',{
                    _method:'POST',
                    student_key : this.keyPoint,
                })
                .then(function(r) {
                    console.log(self.rows);
                    self.rows = r.data.lists;
                    console.log(r.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
            },
        }
    }

</script>

<style scoped>
    .link-dis-hash{
        font-size: 12px;
        padding-left: 20px;
        padding-right: 20px;
        text-decoration:none;
    }
    .link-dis-hash:hover{
        animation: hover_change 1s linear ;
        animation-fill-mode: forwards;
    }

    @keyframes hover_change {
        from{
            filter:brightness(0.5);
        }to{
            filter:brightness(1);
        }
    }
</style>