import { SocialMedia } from "@/Types/Enums";
import { IconType } from "@icons-pack/react-simple-icons";
import { type ReactNode } from "react";

export interface LayoutProps {
    children: ReactNode;
    title?: string;
}

export interface SharedData {
    socialMediaSettings: SocialMediaSetting;
    siteSettings: SiteSetting;

    [key: string]: unknown;
}

export type SocialMediaSetting = {
    [key in SocialMedia]: string | null;
};

export interface SiteSetting {
    name: string;
    description: string;
    logo: string;
    favicon: string;
    og_image: string;
}

export interface FloatingDockItem {
    title: string;
    icon: IconType;
    href: string;
}
