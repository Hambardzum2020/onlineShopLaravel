<template>
    <div>
        <section class="cart_area section_padding">
            <div class="container">
              <div class="cart_inner">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Comfirm</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for = 'p in product'>
                        <td>#{{p.id}}</td>
                        <td>
                          <div class="media">
                            <div class="d-flex">
                              <img width="150" height="100" :src="'../../img/'+p.url" alt="" />
                            </div>
                            <div class="media-body">
                              <p>{{p.name}}</p>
                            </div>
                          </div>
                        </td>

                        <td>
                            <p>{{p.description}}</p>
                        </td>

                        <td>
                            <button class='btn_1' @click = 'updateProd(p.id)'>Conform</button>
                        </td>

                        <td>
                            <button class='btn_1' @click = 'deleteProd(p.id)'>Delete</button>
                        </td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </section>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                product: []
            }
        },
        created(){
            this.axios.get('/api/admin/getProducts').then((r)=>{
                this.product = r.data
            })
        },
        methods:{
            updateProd(x){
                this.axios.get(`/api/admin/update/${x}`).then((r => {
                    this.product = this.product.filter(a => a.id != x);
                }))
            },

            deleteProd(y){
                this.axios.get(`/api/admin/delete/${y}`).then((r => {
                    this.product = this.product.filter(a => a.id != y);
                }))
            }
        }
    }
</script>
