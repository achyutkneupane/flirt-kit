import { SocialMedia } from "@/Types/Enums";
import { IconType, SiFacebook, SiGithub, SiInstagram, SiMedium, SiTiktok, SiWhatsapp, SiX, SiYoutube } from "@icons-pack/react-simple-icons";
import { Linkedin } from "lucide-react";

export const SocialMediaLabels: Record<SocialMedia, string> = {
    [SocialMedia.LinkedIn]: "LinkedIn",
    [SocialMedia.WhatsApp]: "WhatsApp",
    [SocialMedia.X]: "X (formerly Twitter)",
    [SocialMedia.Facebook]: "Facebook",
    [SocialMedia.Instagram]: "Instagram",
    [SocialMedia.TikTok]: "TikTok",
    [SocialMedia.Medium]: "Medium",
    [SocialMedia.YouTube]: "YouTube",
    [SocialMedia.GitHub]: "GitHub",
};

export const SocialMediaPrefix: Record<SocialMedia, string> = {
    [SocialMedia.LinkedIn]: "https://www.linkedin.com/in/",
    [SocialMedia.WhatsApp]: "https://wa.me/",
    [SocialMedia.X]: "https://x.com/",
    [SocialMedia.Facebook]: "https://www.facebook.com/",
    [SocialMedia.Instagram]: "https://www.instagram.com/",
    [SocialMedia.TikTok]: "https://www.tiktok.com/@",
    [SocialMedia.Medium]: "https://medium.com/@",
    [SocialMedia.YouTube]: "https://www.youtube.com/@",
    [SocialMedia.GitHub]: "https://www.github.com/",
};

export const SocialMediaIcons: Record<SocialMedia, IconType> = {
    [SocialMedia.LinkedIn]: Linkedin,
    [SocialMedia.WhatsApp]: SiWhatsapp,
    [SocialMedia.X]: SiX,
    [SocialMedia.Facebook]: SiFacebook,
    [SocialMedia.Instagram]: SiInstagram,
    [SocialMedia.TikTok]: SiTiktok,
    [SocialMedia.Medium]: SiMedium,
    [SocialMedia.YouTube]: SiYoutube,
    [SocialMedia.GitHub]: SiGithub,
};
