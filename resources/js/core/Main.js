import { Sample } from "./Components/Sample";
export class Main {


	constructor(obj){
		Main.instance = this;
        this.sample = new Sample();
	}
}