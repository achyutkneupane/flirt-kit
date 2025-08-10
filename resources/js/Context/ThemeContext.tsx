import type { ThemeContextProps } from "@/Types/Context";
import { createContext } from "react";

const ThemeContext = createContext<ThemeContextProps | undefined>(undefined);

export default ThemeContext;
