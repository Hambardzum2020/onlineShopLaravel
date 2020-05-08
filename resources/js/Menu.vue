<template>
    <div>
<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <router-link class="nav-link" to='/admin'>Home</router-link>
    </li>
    <li class="nav-item">
      <router-link class="nav-link" to='/admin/users'>User</router-link>
    </li>
    <li class="nav-item">
      <router-link class="nav-link" to='/admin/products'>Product</router-link>
    </li>
  </ul>

</nav>
<router-view></router-view>
    </div>
</template>

<script>
    export default {

    }
</script>
