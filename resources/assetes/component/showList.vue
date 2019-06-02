<template>
    <tr v-for="item in infos">
        <th>item.std_id</th>
        <th>item.std_name</th>
        <th>item.std_sex</th>
        <th>item.std_address</th>
        <th>
            <button class="btn-small-Green btn-small" @click="showTable(std_id,time)">修改訪談資訊</button>
            <button class="btn-small-red btn-small"   @click="createNewTable(std_id)">新增訪談資訊</button>
        </th>
    </tr>

</template>

<script>
    export default {
        name: "showList",
        props:{
            infos:{
                type:Object,
                required:true
            }
        }
    }
</script>

<style scoped>

</style>