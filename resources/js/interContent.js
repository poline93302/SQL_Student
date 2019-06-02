let interviewPorject=[
    { spanName : "一般人際關係",name:"relationship"},
    { spanName : "異性交往"    ,name:"interaction"},
    { spanName : "家庭狀況"    ,name:"family"},
    { spanName : "情緒困擾"    ,name:"emotional"},
    { spanName : "課業學習"    ,name:"academic"},
    { spanName : "生涯議題"    ,name:"issues"},
    { spanName : "生理健康"    ,name:"health"},
    { spanName : "其他"        ,name:"others"},
]
new Vue({
    el:"#interview-porject",
    data : function(){
        return{
            interviewPorject,
        } 
    }
})