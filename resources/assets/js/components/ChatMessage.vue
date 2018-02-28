<template lang="html">
  <div class="col-md-8 col-md-2">
      <div class="panel panel-default">
          <div class="panel-body">
            <p>{{ message.message }}</p>
            <small>{{ message.user.name }}</small>
          </div>
      </div>
  </div>
</template>

<script>
export default{
  props: ['message']
}
</script>

<style lang="css">
</style>
