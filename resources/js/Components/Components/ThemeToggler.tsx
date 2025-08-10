import useTheme from "@/Hooks/useTheme";
import { Theme } from "@/Types/Enums";
import { LaptopMinimal, Moon, Sun } from "lucide-react";

const ThemeToggler = (props: { className?: string }) => {
    const { className } = props;
    const { setTheme, theme } = useTheme();

    switch (theme) {
        case Theme.Light:
            return <Sun className={className} onClick={() => setTheme(Theme.Dark)} />;
        case Theme.Dark:
            return <Moon className={className} onClick={() => setTheme(Theme.System)} />;
        default:
            return <LaptopMinimal className={className} onClick={() => setTheme(Theme.Light)} />;
    }
};

export default ThemeToggler;
