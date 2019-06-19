<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 mt-3">
        <div class="card">
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
    Echo.channel(`messages.${this.user.id}`).listen("NewMessage", event => {
      this.handleIncoming(event.message);
    });

    axios.get("api/contacts").then(response => {
      console.log(response.data);
      this.contacts = response.data;
    });
  },
  methods: {
    startConversationWith(contact) {
      this.updateUnreadCount(contact, true);

      axios.get(`api/conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(message) {
      this.messages.push(message);
    },
    handleIncoming(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
        return;
      }

      this.updateUnreadCount(message.from_contact, false);
    },
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
