<template>
    <div>
        <p>Hostname : {{host_name}}</p>
        <p>Ip Address : {{ip_address}}</p>
        <highcharts :options="chartOptions"></highcharts>
        <highcharts :options="dataOptions"></highcharts>
    </div>
</template>

<script>
    import axios from 'axios';
    import { Chart } from 'highcharts-vue';
    export default {
        components:{
          highcharts:Chart
        },
        data () {
          return {
              host_name:null,
              disk_total:null,
              disk_used:null,
              host_name:null,
              ip_address:null,
              load_average:null,
              mem_free:null,
              mem_total:null,
              system_up_time:null,

              chartOptions:{
                  chart: {
                      type: 'spline'
                  },
                  title: {
                      text: 'Edelman Monitor'
                  },
                  xAxis: {
                      categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                      title: {
                          text: null
                      }
                  },
                  yAxis: {
                      min: 0,
                      title: {
                          text: 'Population (millions)',
                          align: 'high'
                      },
                      labels: {
                          overflow: 'justify'
                      }
                  },
                  tooltip: {
                      valueSuffix: ' millions'
                  },
                  plotOptions: {
                      bar: {
                          dataLabels: {
                              enabled: true
                          }
                      }
                  },
                  credits: {
                      enabled: false
                  },
                  series: [{
                      name: 'Year 1800',
                      data: [107, 31, 635, 203, 2]
                  }, {
                      name: 'Year 1900',
                      data: [133, 156, 947, 408, 6]
                  }, {
                      name: 'Year 2000',
                      data: [814, 841, 3714, 727, 31]
                  }, {
                      name: 'Year 2016',
                      data: [1216, 1001, 4436, 738, 40]
                  }]
              },

              dataOptions:{
                  chart: {
                      type: 'pie'
                  },
                  title: {
                      text: 'Edelman Monitor'
                  },
                  credits: {
                      enabled: false
                  },
                  series: [{
                      name: "Disk Usage",
                      data:[{
                          name:"Total Memory",
                          y:100,
                      },{
                          name:"Free Memory",
                          y:20
                      }]
                  }]
              },

          }
        },

        mounted() {
            axios.get('up-time').then((response) => {
                console.log(response);
                this.host_name = response.data[0].hostname;
                this.disk_total = response.data[0].disktotal.replace(/\s/g, "");
                this.disk_used = response.data[0].diskused.replace(/\s/g, "");
                this.ip_address =  response.data[0].ipaddress;
                this.load_average = response.data[0].loadaverage;
                this.mem_free = response.data[0].memfree.trim();
                this.mem_total = response.data[0].memtotal.trim();
                this.system_up_time = response.data[0].systemuptime;

            }).catch((error) => {
                console.log(error)
            })
        }
    }
</script>
