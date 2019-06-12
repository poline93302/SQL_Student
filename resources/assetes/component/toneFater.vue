<template>
    <div class="flex flex-container-row">
        <div style="width: 12%">
            <div style="height:70px">
                <button class="btn" style="width: 90px;height: 50px;" @click="changeMode('tone')">結語</button>
            </div>
            <div style="height:70px">
                <button class="btn"  style="width: 90px;height: 50px" @click="changeMode('pro')" >人數</button>
            </div>
        </div>
        <div v-if="Mode==='tone'" style="width: 100%">
            <end-talk :item_stu=ste_count></end-talk>
        </div>
        <div v-else-if="Mode==='pro'" style="width:100%">
            <end-count :item_stu_d=data_count></end-count>
        </div>
    </div>
</template>

<script>
    import endTalkPath from './endTalk';
    import getcountPath from './get_end_talk';
    export default {
        name: "toneFater",
        data:function () {
            return {
                Mode:'str',
                color:'#b6c1b1',
                color_c:'#1d643b',
                ste_count:{},
                data_count:{},
            }
        },
        methods:{
            changeMode(name){
                this.Mode = name;
                if(name == 'tone')
                    this.getaxios();
                else if(name == 'pro')
                    this.getdateaxios();
            },
            getaxios(){
                let self = this;
                axios.post('/tone/info/get')
                    .then(function (r) {
                        self.ste_count = r.data;
                    })
                    .catch(function (error) {
                        alert(error)
                    })
            },
            getdateaxios(){
                let self = this;
                axios.post('/tone/info/get/date')
                    .then(function (r) {
                        self.data_count = r.data;
                    })
                    .catch(function (error) {
                        alert(error)
                    })
            }
        },
        components:{
            'endTalk':endTalkPath,
            'endCount':getcountPath,
        }
    }
</script>

<style scoped>

</style>