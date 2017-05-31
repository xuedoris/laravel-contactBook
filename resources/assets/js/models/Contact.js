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
}

export default Contact;
