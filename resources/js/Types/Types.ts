import { type ReactNode } from "react";

export interface LayoutProps {
    children: ReactNode;
    title?: string;
}

export interface SharedData {
    [key: string]: unknown;
}
