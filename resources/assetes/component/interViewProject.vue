<template>
    <p class="span-row-2" style="padding-bottom: 10px;">2.  訪談項目 <img src="../src/photo/edit.png"></img> </p><!--  2. use vue to print-->
    <div id="interview-porject">
        <div class="flex  flex-container-row flex-wrap">
            <div class="card-s"v-for = "item in info">
                <input type="checkbox"  /> &nbsp; &nbsp;
                <span>{{item.spanName}}</span>
                <textarea cols="20" rows="8" style="border: 1px black dotted;"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "interViewProject",
        props:{
            info:{
                type:Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>