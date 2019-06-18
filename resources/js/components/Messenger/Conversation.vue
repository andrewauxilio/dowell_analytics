<template>
  <div class="conversation">
    <h1>{{ contact ? contact.name : 'Select a Contact' }}</h1>
    <MessageView :contact="contact" :messages="messages"/>
    <MessageComposer @send="sendMessage"/>
  </div>
</template>

<script>
import MessageView from "./MessageView";
import MessageComposer from "./MessageComposer";

export default {
  props: {
    contact: {
      type: Object,
      default: null
    },
    messages: {
      type: Array,
      default: []
    }
  },
  mounted() {
    console.log("contactlist mounted.");
  },
  methods: {
    sendMessage(text) {
      console.log(text);
    }
  },
  components: {
    MessageView,
    MessageComposer
  }
};
</script>

<style lang="scss" scoped>
.conversation {
  flex: 5;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  h1 {
    font-size: 20px;
    padding: 10px;
    margin: 0;
    border-bottom: 1px dashed lightgray;
  }
}
</style>
