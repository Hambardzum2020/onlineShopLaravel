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
                <th scope="col">User</th>
                <th scope="col">Message</th>
                <th scope="col">Block</th>
                <th scope="col">Block Time</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for = 'u in users'>
                <td>#{{u.id}}</td>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="https://img.icons8.com/plasticine/2x/user.png" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{u.name}} {{u.surname}}</p>
                    </div>
                  </div>
                </td>

                <td>
                    <input type="text" name="" id="">
                    <button @click = 'send' :value= 'u.id'>send</button>
                </td>

                <td>
                    <div v-if = '(new Date().getTime()/1000) > u.block_time' id='blk'>
                        <input placeholder="Block Time In Minits" type="text">
                        <button :value='u.id' @click = 'block'>Sumbmit</button>
                    </div>
                </td>

                <td>
                    <b id='blk_time' v-if = "(new Date().getTime()/1000) < u.block_time && u.block == 1">{{Math.ceil((u.block_time - (new Date().getTime()/1000))/60)}} Minute</b>
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
            return{
                users:[],
                id: $("#k").val(),
            }
        },
        created(){
            this.axios.get('/api/admin/getUsers').then((r)=>{
                this.users = r.data
            })
        },
        methods:{
            send(e){
               let user_id = $(e.target).val();
               let message = $(e.target).prev().val()
               this.axios.post('/api/admin/send', {user_id: user_id, id: this.id, namak: message})
               .then((r)=>{
                    $(e.target).prev().val("")
               })
            },
            BlockUser(e){
                $(e.target).next().toggle();
            },
            block(e){
                let user_id = $(e.target).val();
                let time = $(e.target).prev().val();
                this.axios.post('/api/admin/block', {user_id, time })
                .then((r)=>{
                    $("#blk").css('display', 'none');
                    $("#blk").before(`<b>Blocked</b>`);
                })
            }
        }
    }
</script>
