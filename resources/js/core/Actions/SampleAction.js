import { Action }               from "./Action";

export class SampleAction extends Action {

    constructor( id, ajaxInfo, formData ) {
    
        let data = {
            "action": id,
        };
        Object.assign( data, formData );
        super( id, data );

    }
    
    response( resp ) {
        console.log( resp );
    }

    error( xhr, textStatus, errorThrown ) {
        console.log(`Sample action Error: ${errorThrown} (${textStatus})`);
    }
}