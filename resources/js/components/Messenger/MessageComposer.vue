<template>
  <!----------Composer Component--------->
  <div class="composer">
    <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: ""
    };
  },

  methods: {
    //Fires the send event and clears the text area
    send(event) {
      event.preventDefault();

      if (this.message == "") {
        return;
      }

      this.$emit("send", this.message);
      this.message = "";
    }
  }
};
</script>

<style lang="scss" scoped>
.composer textarea {
  width: 96%;
  margin: 10px;
  resize: none;
  border-radius: 3px;
  border: 1px solid lightgray;
  padding: 6px;
}
</style>