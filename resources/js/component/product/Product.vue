<template>
<div class="left-side">
            <Sidebar />
        </div>
<div class="main-header">
            <navbar></navbar>
        </div>
  <div class="right-side">
    <div class="content p-5">
        <h3>Products List</h3>
        <button class="btn btn-dark align-self-end addProduct" @click="showmodel"><i class="fas fa-plus"></i> Add Product</button>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Sizes</th>
                    <th>Color</th>
                    <th>Stock</th>
                    <th>Prize</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>sku-01</td>
                <td>shirt</td>
                <td>x, xl, m, l, s</td>
                <td>black</td>
                <td>30</td>
                <td>100</td>
                <td>
                    <i class="fas fa-edit"></i>  <i class="fas fa-trash-alt"></i>
                </td>
            </tbody>
        </table>
    </div>
  </div>
  <product-add-model ref="productAddModel"></product-add-model>
</template>

<script>
import ProductAddModel from "../model/ProductAdd.vue"
import Navbar from '../bars/Navbar.vue'
import Sidebar from '../bars/Sidebar.vue'
export default {
    components: {
        ProductAddModel,
        Navbar,
        Sidebar
    },
    methods: {
        showmodel() {
            this.$refs.productAddModel.showmodel()
        }
    },
};
</script>

<style lang="scss" scoped>
    h3{
        font-family: 'Montserrat Alternates';
        font-weight: bold;
    }
    .addProduct{
        background-color: #17A169;
        border: none;
        &:hover{
            box-shadow: 0 0 15px 0px #17A169;
        }
    }
    .table{
        .fa-edit{
            color: #17A169;
        }
        .fa-trash-alt{
            color: #77020b;
        }
    }
</style>
