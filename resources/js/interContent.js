let interviewPorject=[
    { spanName : "一般人際關係",name:"relationship"},
    { spanName : "異性交往"    ,name:"interaction"},
    { spanName : "家庭狀況"    ,name:"family"},
    { spanName : "情緒困擾"    ,name:"emotional"},
    { spanName : "課業學習"    ,name:"academic"},
    { spanName : "生涯議題"    ,name:"issues"},
    { spanName : "生理健康"    ,name:"health"},
    { spanName : "其他"        ,name:"others"},
];
let loginInfo= {teacher_id:"",teacher_name:"炒爽沒有",teacher_class:"沒吵爽班",teacher_password:"" };

new Vue({
    el:"#app",
    data : function(){
        return{
            interviewPorject,
            loginInfo,
        } 
    },
    methods:{
        check(id,password){
            console.log(id + " " + password);
            alert("登入");
        }
    }
});