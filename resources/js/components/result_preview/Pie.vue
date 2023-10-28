<template>
    <div id="chart">
        <apexchart type="pie" width='400' height='220' :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
    name: 'Pie',
    data() {
      return {
       
          series: [0, 0],
          chartOptions: {
              colors: ["#87CEEB", "#2c7fcb"],
            chart: {
               width: 600,
                height: 300,
                type: 'pie',

            },
            labels: ['Like', 'Dislike'],
            responsive: [{
            //   breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
           
      }

},
    props: ['totalLikes', 'totalDisLikes'],

    watch: {
    totalLikes: function (value) {
        this.series = [value]
    },
    totalDisLikes: function (value) {
        this.series = [value]
    },

    },
    mounted(){
    
        this.series = [this.totalLikes, this.totalDisLikes]
    },
    beforeUpdate(){
        this.series = [this.totalLikes, this.totalDisLikes]
    }
}
</script>