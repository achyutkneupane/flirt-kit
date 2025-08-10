import { Theme } from "@/Types/Enums";

export interface ThemeContextProps {
    theme: Theme;
    systemTheme: Theme;
    isDarkMode: boolean;
    setTheme: (theme: Theme) => void;
    toggleTheme: () => void;
}
