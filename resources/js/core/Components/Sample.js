import {SampleAction} from "../Actions/SampleAction";
export class Sample {
    constructor() {
        jQuery( window ).on( 'load', () => {
            this.sampleAjaxRequest();   
        });
    }

    sampleAjaxRequest(){
        new SampleAction( 'sample_action', wp_boilerplate_object.ajaxurl, {} ).load();
    }
}