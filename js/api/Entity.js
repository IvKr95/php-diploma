/**
 * Entity class - a basic to communicate with a server.
 * Has URL property equal to an empty string.
 * Has HOST property equal to '..'.
 * */
class Entity {

    /**
     * Requests a list of projects.
     * */
    static list (data, callback = f => f) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'GET',
        responseType: 'json',
        callback (e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      }); 
    }
  
    /**
     * Creates a new project.
     * */
    static create (data, callback = f => f) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'POST',
        responseType: 'json',
        callback (e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Gets the information about an interpreter(-s)
     * or a project.
     * */
    static get (data, callback = f => f) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'GET',
        responseType: 'json',
        callback (e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Updates the info of a project
     * or an interpreter.
     * */
    static update (data, callback = f => f) {
      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'POST',
        responseType: 'json',
        callback (e, response) {
          if (e === null && response) {
            callback(e, response);
          } else {
            console.error(e);
          };
        }
      });
    }
  
    /**
     * Deletes a project.
     * */
    static remove (id, callback = f => f) {
      const data = JSON.stringify({
        'action' : 'delete',
        'id' : id
      });

      return createRequest({
        url: this.HOST + this.URL,
        data,
        method: 'POST',
        responseType: 'json',
        callback (e, response) {
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
Entity.HOST = '..';