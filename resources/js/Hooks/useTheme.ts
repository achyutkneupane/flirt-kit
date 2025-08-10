import ThemeContext from "@/Context/ThemeContext";
import { useContext } from "react";
const useTheme = () => {
    const context = useContext(ThemeContext);
    if (!context) {
        throw new Error("useTheme must be used within a ThemeProvider");
    }
    return context;
};

export default useTheme;
