# Use official Node.js image as base
FROM node:18

# Set working directory inside the container
WORKDIR /app

# Copy package files separately to leverage Docker caching
COPY package.json package-lock.json ./

# Install dependencies
RUN npm install --legacy-peer-deps

# Copy all project files into the container
COPY . .

# Expose port for Vite (default: 5173)
EXPOSE 5173

# Run the development server
CMD ["npm", "run", "dev", "--", "--host"]
