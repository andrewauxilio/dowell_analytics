<template>
  <!----------Messenger Component--------->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 mt-3">
        <div class="card card-primary">
          <div class="card-header">Messenger</div>
          <div class="card-body">
            <div class="messenger">
              <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
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
    this.getMessages();
    this.getContacts();
  },

  methods: {
    //Pull contact data from the API
    getContacts() {
      axios.get("api/contacts").then(response => {
        this.contacts = response.data;
      });
    },

    //Listens for broadcasted messages
    getMessages() {
      Echo.channel(`messages.${this.user.id}`).listen("NewMessage", event => {
        this.handleIncoming(event.message);
      });
    },

    //Opens the conversation with the selected contact
    startConversationWith(contact) {
      this.updateUnreadCount(contact, true);

      axios.get(`api/conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },

    //Saves the message in the messages array
    saveNewMessage(message) {
      this.messages.push(message);
    },

    //Handles the broadcasted messages
    handleIncoming(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
        return;
      }

      this.updateUnreadCount(message.from_contact, false);
    },

    //Checks if the messages are read or unread and changes status
    updateUnreadCount(contact, reset) {
      this.contacts = this.contacts.map(single => {
        if (single.id !== contact.id) {
          return single;
        }
        if (reset) single.unread = 0;
        else single.unread += 1;
        return single;
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
