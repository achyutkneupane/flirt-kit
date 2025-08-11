import { SocialMedia } from "@/Types/Enums";
import { type ReactNode } from "react";
import {IconType} from "@icons-pack/react-simple-icons";

export interface LayoutProps {
    children: ReactNode;
    title?: string;
}

export interface SharedData {
    socialMediaSettings: SocialMediaSetting;

    [key: string]: unknown;
}

export type SocialMediaSetting = {
    [key in SocialMedia]: string | null;
};

export interface FloatingDockItem {
    title: string;
    icon: IconType;
    href: string;
}
