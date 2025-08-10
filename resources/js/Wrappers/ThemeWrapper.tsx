import ThemeContext from "@/Context/ThemeContext";
import { Theme } from "@/Types/Enums";
import type { LayoutProps } from "@/Types/Types";
import { type FC, useEffect, useState } from "react";

const ThemeWrapper: FC<LayoutProps> = (props) => {
    const { children } = props;

    const themeVariable: string = "FilamentInertiaKitTheme";

    const storedTheme = localStorage.getItem(themeVariable);
    const [theme, setTheme] = useState<Theme>(storedTheme ? (storedTheme as Theme) : Theme.System);

    const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? Theme.Dark : Theme.Light;
    const isDarkMode = theme === Theme.Dark || (theme === Theme.System && systemTheme === Theme.Dark);
    const toggleTheme = () => {
        if (theme === Theme.Light) {
            setTheme(Theme.Dark);
        } else if (theme === Theme.Dark) {
            setTheme(Theme.System);
        } else {
            setTheme(Theme.Light);
        }
    };

    const toggleThemeInDOMAndLocalStorage = () => {
        const htmlDOM = document.documentElement;
        if (theme === Theme.Light) {
            htmlDOM.classList.remove(Theme.Dark);
            localStorage.setItem(themeVariable, Theme.Light);
        } else if (theme === Theme.Dark) {
            htmlDOM.classList.add(Theme.Dark);
            localStorage.setItem(themeVariable, Theme.Dark);
        } else {
            const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? Theme.Dark : Theme.Light;
            htmlDOM.classList.toggle(Theme.Dark, systemTheme === Theme.Dark);
            localStorage.setItem(themeVariable, Theme.System);
        }
    };

    useEffect(toggleThemeInDOMAndLocalStorage, [theme]);

    return (
        <ThemeContext.Provider
            value={{
                theme: theme,
                systemTheme: systemTheme,
                isDarkMode: isDarkMode,
                setTheme: setTheme,
                toggleTheme: toggleTheme,
            }}
        >
            {children}
        </ThemeContext.Provider>
    );
};

export default ThemeWrapper;
