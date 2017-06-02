class Contact {
    static searchContacts(keyword) {
        if(keyword) {
            return axios.get('/contacts/'+keyword+'/search');
        }
        return axios.get('/contacts');
    }
    static topContacts(type) {
        return axios.get('/contacts/top/'+type);
    }
    static deleteContact(id){
        return axios.delete('/contacts/'+id);
    }
}

export default Contact;
