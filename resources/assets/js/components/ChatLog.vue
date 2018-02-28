<template lang="html">
  <div class="chat-log">
      <chat-message v-for="message in messages" :message="message"></chat-message>
      <div class="empty" v-show="messages.length ==0">Nothing to see here!</div>
  </div>
</template>

<script>
export default{
props: ['messages']
}
</script>

<style lang="css">
.empty{
  padding: 1rem;
  text-align: center;
}
</style>
