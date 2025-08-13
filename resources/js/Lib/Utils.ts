import { SocialMediaIcons, SocialMediaLabels, SocialMediaPrefix } from "@/Lib/EnumConstants";
import { SocialMedia } from "@/Types/Enums";
import { FloatingDockItem, SocialMediaSetting } from "@/Types/Types";
import { ClassValue, clsx } from "clsx";
import { twMerge } from "tailwind-merge";

export const cn = (...inputs: ClassValue[]) => {
    return twMerge(clsx(inputs));
};

export const ucWords = (str: string): string => {
    return str
        .toLowerCase()
        .split(" ")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
};

export const filterAndReturnSocialMediaLinks = (socialMedia: SocialMediaSetting): FloatingDockItem[] => {
    return Object.entries(socialMedia)
        .filter(([, value]) => value && value.trim().length > 0)
        .map(([key, value]) => {
            const mediaKey = key as SocialMedia;
            const title = SocialMediaLabels[mediaKey];
            const prefix = SocialMediaPrefix[mediaKey];
            const icon = SocialMediaIcons[mediaKey];
            return {
                title,
                icon,
                href: prefix + value,
            };
        });
};
