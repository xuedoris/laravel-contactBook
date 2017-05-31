class Contact {
    static searchContacts(keyword) {
        if(keyword) {
            return axios.get('/contacts/'+keyword+'/search');
        }
        return axios.get('/contacts');
    }
}

export default Contact;
