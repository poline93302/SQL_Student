<template>

    <table width="100%" class="table-list">
        <tr>
            <th width="15%">學號</th>
            <th width="15%">姓名</th>
            <th width="10%">姓別</th>
            <th width="20%">地址</th>
            <th width="10%">訪談次數</th>
            <th width="30%">訪談資訊</th>
        </tr>
        <tr v-for="row in infos">
            <td>{{ row.stud_id }}</td>
            <td>{{ row.stud_name }}</td>
            <td>{{ row.stud_sex }}</td>
            <td>{{ row.stud_address }}</td>
            <td>time</td>
            <td>
                <button class="btn-small-Green  btn-small"   @click="showTable(std_id,time)">新增</button>
                <button class="btn-small-Yellow btn-small"   @click="createNewTable(std_id)">修改</button>
                <button class="btn-small-red    btn-small"   @click="createNewTable(std_id)">刪除</button>
            </td>
        </tr>
    </table>
</template>

<script>
    export default {
        props:{
            infos:{
                type:Object,
                request:true,
            }
        }
    }
</script>

<style scoped>

</style>