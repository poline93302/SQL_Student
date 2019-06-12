<template>
    <div style="display: flex; flex-direction:column;margin-left: 20px;width:95%;">
        <div class="white_page">
            <div style="display:flex; flex-direction: row; width: 100%;">
                <ul>
                    <li v-for="row in item_stu_d.inter_info">
                        <p style="display: flex; flex-direction:row;">
                            <span>{{ row.time_Date }}</span>
                            <span>&nbsp;:&nbsp;</span>
                            <span v-for="(xl,index) in row.Date_count ">
                                <span v-if="index < 30">
                                    <span style="background-color:#1f6fb2;border:1px white solid" >&nbsp;&nbsp;&nbsp;</span>
                                </span>
                            </span>
                            {{row.Date_count }}人
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import * as d3 from "d3";

    export default {
        name: "get_end_talk",
        props:{
            item_stu_d:{
                type:Object,
                default:"",
            }
        },
        data() {
            return{
                start_date:'',
                end_date:'',
                data :[],
            }
        },
        methods:{
            print(){
                console.log('123');
                let chartSvg = d3.select(this.$refs.baseBarChart);
                let chartData = [10,20,30,40,50,10];
                let width = this.width;
                let barHeight = this.height;

                 chartSvg = d3.select(this.$refs.baseBarChart)
                    .attr('width', width)
                    .attr('height', barHeight * chartData.length);
                // x軸比例尺
                let xScale = d3.scaleLinear()
                    .domain([0, d3.max(chartData)])
                    .range([0, width]);
                // this.selection.selectAll(element).data(data).enter().append(element)
                // 矩形和label文字組合的容
                let g = chartSvg.selectAll('g')
                    .data(chartData)
                    .enter().append('g')
                    .attr('transform', function (d, i) { return 'translate(0,' + i * barHeight + ')' })
                // 新增矩形
                g.append('rect')
                    .attr('width', xScale)
                    .attr('height', barHeight - 2)
                    .attr('fill', 'green')
                // 新增label文字
                g.append('text')
                    .attr('x', function (d) { return xScale(d) + 3 })
                    .attr('y', barHeight - 10)
                    .attr('dy', '0.3em')
                    .attr('fill', 'red')
                    .style('font-size', '12px')
                    .text(function (d) { return d })
            }
        },
        beforeMount(){
            this.print();
        }
    }


</script>

<style scoped>
    .white_page{
        width: 90%;
        background-color: white;
        height: 420px;
        margin: auto;
        padding: 40px;
        border-radius: 20px;
        font-size: 20px;
    }
    ul{
        list-style:none;
    }
</style>