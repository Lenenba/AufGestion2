
<script>
import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
  props:['project'],
  data: () => ({
    chartdata: {
      labels: [],
      datasets: [
        {
          label: 'Montant Budget',
          backgroundColor: '#f87979',
          data: []
        },
        {
          label: 'Montant Cost',
          backgroundColor: '#000',
          data: []
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  }),
  
  methods:{
      setValue(){
    
      }
  },
  mounted () {
      this.project.forEach(element => {
          this.chartdata.labels.push(element.ProjectName.substring(0,10));
          this.chartdata.datasets[0].data.push(element.PFCRawCostAmounts);
          this.chartdata.datasets[1].data.push(element.PFCBurdenedCostAmounts);
      });
    this.renderChart(this.chartdata, this.options)
  }
}
</script>