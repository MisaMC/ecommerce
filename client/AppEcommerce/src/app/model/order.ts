export class Order{
    constructor(
        public orderNumber: number,
        public orderDate: string,
        public requiredDate: string,
        public shippedDate: string,
        public status: string,
        public comments: string,  
        public customerNumber: number) { }
}