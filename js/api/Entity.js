/**
 * Класс Entity - базовый для взаимодействия с сервером.
 * Имеет свойство URL, равно пустой строке.
 * Имеет свойство HOST, равно 'http://ivkr95.000webhostapp.com/diploma'.
 * */
class Entity {

    /**
     * Запрашивает с сервера список проектов.
     * */
    static list( data, callback = f => f ) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'GET',
        responseType: 'json',
        callback(e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      }); 
    }
  
    /**
     * Создаёт заявку на перевод
     * */
    static create( data, callback = f => f ) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'POST',
        responseType: 'json',
        callback(e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Получает информацию о переводчике
     * */
    static get( path, data, callback = f => f ) {
      return createRequest({
        url: this.HOST + this.URL + path,
        data,
        method: 'GET',
        responseType: 'json',
        callback(e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Обновляет информацию о проекте или переводчике
     * */
    static update( path, data, callback = f => f ) {
      return createRequest({
        url: this.HOST + this.URL + path,
        data,
        method: 'GET',
        responseType: 'json',
        callback(e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Удаляет информацию о проекте
     * */
    static remove(id, callback = f => f) {
      const data = JSON.stringify({
        'action' : 'delete',
        'id' : id
      });

      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'POST',
        responseType: 'json',
        callback(e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  }
  
Entity.URL = '';
Entity.HOST = 'http://ivkr95.000webhostapp.com/diploma';