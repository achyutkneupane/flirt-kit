import { SocialMedia } from "@/Types/Enums";
import { SiFacebook, SiGithub, SiInstagram, SiMedium, SiTiktok, SiWhatsapp, SiX, SiYoutube } from "@icons-pack/react-simple-icons";
import { Linkedin } from "lucide-react";

export const SocialMediaPrefix = {
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

export const SocialMediaIcons = {
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
