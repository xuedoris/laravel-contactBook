class Errors {
    constructor() {
        this.errors = {};
    }
    has(field){
        return this.errors[field];
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    store(data){
        this.errors = data;
    }
    any(){
        return Object.keys(this.errors).length > 0;
    }
    clear(field){
        if(field) {
            delete this.errors[field];
            return;
        }
        this.errors = {};
    }
}
class Form{
    constructor(data) {
        this.data = data;
        // This enable to call this.name(form.name) because [field]==.field
        for(let field in data){
            this[field] = data[field];
        }
        //this.message = '';
        this.errors = new Errors();
    }
    getdata(){
        let currentData = {};
        for(let field in this.data){
            currentData[field] = this[field];
        }
        return currentData;
    }
    submit(requestType, url){
        var self = this;
        axios[requestType](url, this.getdata()).then(function (response) {
            self.message = response.data.message;
            self.reset();
        }).catch(function (error) {
            self.errors.store(error.response.data);
        });
    }
    reset(){
        for(let field in this.data){
            this[field] = '';
        }
        this.errors.clear();
    }
}

export default Form;
