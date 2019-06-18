<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 mt-3">
        <div class="card">
          <div class="card-header">Messenger</div>

          <div class="card-body">
            <div class="messenger">
              <Conversation :contact="selectedContact" :messages="messages"/>
              <ContactList :contacts="contacts" @selected="startConversationWith"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Conversation from "./Conversation";
import ContactList from "./ContactList";

export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: []
    };
  },
  mounted() {
    console.log(this.user);
    axios.get("api/contacts").then(response => {
      console.log(response.data);
      this.contacts = response.data;
    });
    console.log("messenger mounted.");
  },
  methods: {
    startConversationWith(contact) {
      axios.get(`api/conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    }
  },
  components: {
    Conversation,
    ContactList
  }
};
</script>

<style lang="scss" scoped>
.messenger {
  display: flex;
}
</style>
