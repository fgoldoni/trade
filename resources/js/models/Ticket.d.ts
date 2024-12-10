import { Collection } from '@/types';

export interface Ticket {
    id: string;
    quantity: number;
    model: string;
    name: string;
    price: string;
    compare_price: string | null;
    voucher: any;
    description: string | null;
    tags: string[] | [];
    times: string[] | [];
    entries: string[] | [];
    mode: any;
    reservation_options: any;
    modes: any;
    collections: Collection[] | [];
}

export interface Event {
    id: string;
    name: string;
    description: string | null;
    tags: string[] | [];
    collections: Collection[] | [];
}
