export class Action {

  	constructor( id, data ) {
  	    this.id = id;
  	    this.url = wp_boilerplate_object.ajaxurl.toString().replace( '%%endpoint%%', this.id );
  	    this.data = data;
  	}

  	prep( id, ajaxInfo, items ) {
        let data= {
            "action": id,
        };

        Object.assign( data, items );

        return data;
    }

  	load() {
  	    jQuery.ajax({
  	        type: "POST",
  	        url: this.url,
  	        data: this.data,
            dataFilter: this.dataFilter.bind( this ),
  	        success: this.response.bind( this ),
  	        error: this.error.bind( this ),
  	        dataType: 'json'
  	    });
  	}

    dataFilter( rawResponse, dataType ){
        return rawResponse;
    }

    error( xhr, textStatus, errorThrown ) {
        let message;

        if ( xhr.status === 0)  {
            message = 'Could not connect to server. Please refresh and try again or contact site administrator.';
        } else if ( xhr.status === 404 ) {
            message = 'Requested resource could not be found. Please contact site administrator. (404)';
        } else if ( xhr.status === 500 ) {
            message = 'An internal server error occurred. Please contact site administrator. (500)';
        } else if ( textStatus === 'parsererror' ) {
            message = 'Server response could not be parsed. Please contact site administrator.';
        } else if ( textStatus === 'timeout' || xhr.status === 504 ) {
            message = 'The server timed out while processing your request. Please refresh and try again or contact site administrator.';
        } else if ( textStatus === 'abort' ) {
            message = 'Request was aborted. Please contact site administrator.';
        } else if ( Number.isInteger(xhr.status) ) {
            message = `XHR status: ${xhr.status} : XHR errorThrown: ${errorThrown}`;
        } else {
            message = `Uncaught Error: ${xhr.responseText}`;
        }

        console.log( ` XHR response: ${xhr.response}`);
        console.log( ` XHR responseText: ${xhr.responseText}`);
        console.log( ` XHR status: ${xhr.status}`);
        console.log( ` XHR errorThrown: ${errorThrown}`);

    }

  	get id(){
  	    return this._id;
  	}

  	set id( value ) {
  	    this._id = value;
  	}

  	get url() {
  	    return this._url;
  	}

  	set url( value ) {
  	    this._url = value;
  	}

  	get data(){
  	    return this._data;
  	}

  	set data( value ) {
  	    this._data = value;
  	}
}