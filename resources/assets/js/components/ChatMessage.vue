<template lang="html">
  <div class="col-md-8 col-md-2">
      <div class="panel panel-default">
          <div class="panel-body">
            <p>{{ message }}</p>
            <small>{{ user }}</small>
          </div>
      </div>
  </div>
</template>

<script>
export default{
  data(){
    return{
      message:"This is some message",
      user: "John Doe"
    }
  }
}
</script>

<style lang="css">
</style>
