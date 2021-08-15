<template>
  <div class="right-side mt-5">
    <div class="content">
      <div class="short-details">
        <div class="card m-3">
          <div class="card-header bg-dark">Products</div>
          <div class="card-body bg-info d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Orders</div>
          <div class="card-body bg-success d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Today's Amount</div>
          <div class="card-body bg-warning d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Monthly Amount</div>
          <div class="card-body bg-secondary d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
      </div>
      <div class="chartDetails d-flex">
        <div class="orderChart m-3 justify-content-between">
          <div class="card">
            <div class="card-header bg-dark text-white">Products Chart</div>
            <div class="card-body">
              <canvas
                id="orderChart"
                aria-label="Hello ARIA World"
                role="img"
              ></canvas>
            </div>
          </div>
        </div>
        <div class="productChart m-3 justify-content-between">
          <div class="card">
            <div class="card-header bg-dark text-white">Orders Chart</div>
            <div class="card-body">
              <canvas
                id="productChart"
                aria-label="Hello ARIA World"
                role="img"
              ></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    
    data() {
        return {
            labels : [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            ],
            dataSet : {
                labels: this.labels,
                datasets: [{
                    label: 'Product Add Chart',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [5, 10, 5, 2, 20, 45],
                }]
            },
            config : {
                type: 'line',
                data: this.dataSet,
                options: {}
            }
        }
    },
    methods: {
        orderChart(){
            return new Chart(
            document.getElementById('orderChart'),
            this.config
            
        )
        
        }
    },
    mounted () {
        debugger;
        this.orderChart();
    },
    
  
}
</script>
